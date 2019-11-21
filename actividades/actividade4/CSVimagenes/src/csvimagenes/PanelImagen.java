/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package csvimagenes;

import java.awt.Image;
import java.io.File;
import javax.swing.ImageIcon;
import javax.swing.JLabel;
import javax.swing.JTextField;

/**
 *
 * @author Santiago
 */
public class PanelImagen extends javax.swing.JPanel {

    /**
     * Creates new form PanelImagen
     */
    public PanelImagen() {
        initComponents();
    }

    public PanelImagen(File archivoImagen) {
        initComponents();
        Image imagenFuente = new ImageIcon(archivoImagen.getPath()).getImage();
        ImageIcon imagenEscalada = new ImageIcon(imagenFuente.getScaledInstance(90, 90, Image.SCALE_SMOOTH));
        jLabel1.setIcon(imagenEscalada);
        jTextField1.setText(archivoImagen.getName());
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel1 = new javax.swing.JLabel();
        jTextField1 = new javax.swing.JTextField();

        setLayout(new java.awt.BorderLayout());
        add(jLabel1, java.awt.BorderLayout.CENTER);
        add(jTextField1, java.awt.BorderLayout.PAGE_END);
    }// </editor-fold>//GEN-END:initComponents


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel jLabel1;
    private javax.swing.JTextField jTextField1;
    // End of variables declaration//GEN-END:variables
}
