package de.hsharz.graphentheorie.labor1;

import java.util.Arrays;

import de.hsharz.pds.Environment;

public class Graph extends Environment {

	private int anzahlKnoten;
	private int[][] graph;
	private int[] knotenanordnungsNummern;

	public void readGraph() {
		anzahlKnoten = stdin.readInt();
		graph = new int[anzahlKnoten][anzahlKnoten];
		for (int i = 0; i < anzahlKnoten; i++) {
			for (int j = 0; j < anzahlKnoten; j++) {
				graph[i][j] = stdin.readInt();
			}
		}
	}

	public void berechneLineareKnotenanordnung() {

		initialisiereKnotenAnordnungsnummern();

		for (int i = 0; i < anzahlKnoten; i++) {
			berechneLineareKnotenanordnung(i, anzahlKnoten - 1);
//			for (int aktuellerKnoten = anzahlKnoten - 1; aktuellerKnoten >= 0; aktuellerKnoten--) {
//				if (knotenanordnungsNummern[aktuellerKnoten] < 0 && !hatKnotenVorgaenger(aktuellerKnoten)) {
//					wipeKnotenValues(aktuellerKnoten);
//					knotenanordnungsNummern[aktuellerKnoten] = i + 1;
//					break;
//				}
//			}
		}
	}

	private void berechneLineareKnotenanordnung(int index, int aktuellerKnoten) {
		if (aktuellerKnoten < 0) {
			return;
		}

		if (knotenanordnungsNummern[aktuellerKnoten] < 0 && !hatKnotenVorgaenger(aktuellerKnoten)) {
			wipeKnotenValues(aktuellerKnoten);
			knotenanordnungsNummern[aktuellerKnoten] = index + 1;
		} else {
			berechneLineareKnotenanordnung(index, aktuellerKnoten - 1);
		}
	}

	private void initialisiereKnotenAnordnungsnummern() {
		knotenanordnungsNummern = new int[anzahlKnoten];
		Arrays.fill(knotenanordnungsNummern, -1);
	}

	private void wipeKnotenValues(int knoten) {
		Arrays.fill(graph[knoten], 0);
	}

	/**
	 * Prueft, ob in dem gegebenen Graphen eine Schleife existiert
	 * 
	 * @return true, falls eine Schleife existiert; andernfalls false
	 */
	private boolean hatGraphEinenKreis() {
		for (int n : knotenanordnungsNummern) {
			if (n < 0) {
				return true;
			}
		}
		return false;
	}

	private boolean hatKnotenVorgaenger(int knoten) {

		for (int i = 0; i < anzahlKnoten; i++) {
			// den gegebenen Knoten überspringen
			if (i == knoten) {
				continue;
			}

			// Wenn dieser Knoten auf den gegebenen Knoten verweist, dann hat der gegebene
			// Knoten einen Vorgaenger; und zwar den Knoten an der Stelle i
			if (graph[i][knoten] == 1) {
				return true;
			}
		}

		// es wurde kein Vorgaenger gefunden
		return false;
	}

	public void printLineareKnotenanordnungNummern() {

		if (hatGraphEinenKreis()) {
			System.out.println("Der Graph hat einen Kreis!");
			return;
		}

		System.out.println();

		StringBuilder knotenIndexBuilder = new StringBuilder("Knotenindex:\t\t");
		for (int i = 1; i <= anzahlKnoten; i++) {
			knotenIndexBuilder.append(i).append('\t');
		}

		StringBuilder trennStrichBuilder = new StringBuilder();
		for (int i = 0; i < knotenIndexBuilder.length(); i++) {
			trennStrichBuilder.append("---");
		}

		StringBuilder anordnungsnummerBuilder = new StringBuilder("Anordnungsnummer:\t");
		for (int k : knotenanordnungsNummern) {
			anordnungsnummerBuilder.append(k).append('\t');
		}

		System.out.println(knotenIndexBuilder.toString());
		System.out.println(trennStrichBuilder.toString());
		System.out.println(anordnungsnummerBuilder.toString());

	}

}
