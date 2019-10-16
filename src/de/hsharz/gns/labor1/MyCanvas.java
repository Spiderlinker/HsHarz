package de.hsharz.gns.labor1;

import java.util.List;

import javafx.scene.canvas.Canvas;
import javafx.scene.canvas.GraphicsContext;
import javafx.scene.paint.Color;

// Dient als Leinwand, Eclipse Problem behoben
public class MyCanvas extends Canvas {

	private static int MAX = 700;
	private Middleware middleware = null;
	private List<MyGrfObject> grafikListe;

	public MyCanvas(String filename) {
		super(MAX, MAX);
		this.middleware = new Middleware();
		this.middleware.readFile(filename);
		this.grafikListe = middleware.getGrafikliste();
	}

	public void paint() {
		// weiﬂer Hintergrund
		GraphicsContext gc = this.getGraphicsContext2D();
		gc.beginPath();
		gc.setFill(Color.WHITE);
		gc.clearRect(0, 0, MAX, MAX);

		// gc.setStroke(Color.BLACK);
		// gc.setLineWidth(0.5);
		// gc.rect(0, 0, middleware.getWidth(), middleware.getHeight());
		// gc.stroke();

		for (MyGrfObject graficObject : grafikListe) {
			graficObject.paint(gc);
			gc.stroke();
		} // for

	} // paint

}