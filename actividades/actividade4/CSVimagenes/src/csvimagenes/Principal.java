package csvimagenes;

import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.DefaultComboBoxModel;

/**
 *
 * @author Santiago
 */
public class Principal extends javax.swing.JFrame {

    File directorioImagenes = new File("../Imagenes");
    DefaultComboBoxModel<String> modelo;
    File ficheroSalida = new File("../categorias.csv");

    public Principal() {
        initComponents();
        panelImagenes.setLayout(new WrapLayout(FlowLayout.LEFT));
        modelo = new DefaultComboBoxModel();
        jComboBox1.setModel(modelo);
        cargarCategorias();
        if (modelo.getSize() > 0) {
            cargarImagenes();
        }
        jComboBox1.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                cargarImagenes();
                panelImagenes.revalidate();
                panelImagenes.repaint();
            }
        });
    }

    public void cargarCategorias() {
        for (File categoria : directorioImagenes.listFiles()) {
            modelo.addElement(categoria.getName());
        }
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jScrollPane1 = new javax.swing.JScrollPane();
        panelImagenes = new javax.swing.JPanel();
        jPanel2 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jComboBox1 = new javax.swing.JComboBox<>();
        btnGuardar = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Renombrar imagenes");
        setPreferredSize(new java.awt.Dimension(1000, 600));

        panelImagenes.setLayout(new java.awt.FlowLayout(java.awt.FlowLayout.LEFT));
        jScrollPane1.setViewportView(panelImagenes);

        getContentPane().add(jScrollPane1, java.awt.BorderLayout.CENTER);

        jPanel2.setBackground(new java.awt.Color(51, 102, 255));

        jLabel1.setText("Categoría");
        jPanel2.add(jLabel1);

        jComboBox1.setPreferredSize(new java.awt.Dimension(100, 26));
        jPanel2.add(jComboBox1);

        getContentPane().add(jPanel2, java.awt.BorderLayout.PAGE_START);

        btnGuardar.setText("Guardar");
        btnGuardar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnGuardarActionPerformed(evt);
            }
        });
        getContentPane().add(btnGuardar, java.awt.BorderLayout.PAGE_END);

        pack();
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents
    void cargarImagenes() {
        panelImagenes.removeAll();
        String categoriaSeleccionada = (String) modelo.getSelectedItem();
        File directorioSeleccionado = new File(directorioImagenes.getPath() + "/" + categoriaSeleccionada);
        for (File imagen : directorioSeleccionado.listFiles()) {
            panelImagenes.add(new PanelImagen(imagen));
        }
    }
    private void btnGuardarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnGuardarActionPerformed
        if (ficheroSalida.exists()) {
            ficheroSalida.delete();
        } else {
            try {
                ficheroSalida.createNewFile();
            } catch (IOException ex) {
                Logger.getLogger(Principal.class.getName()).log(Level.SEVERE, null, ex);
            }
        }

        ArrayList<String> categorias = new ArrayList();
        for (int i = 0; i < modelo.getSize(); i++) {
            categorias.add(modelo.getElementAt(i));
        }
        try (BufferedWriter escritor = new BufferedWriter(new FileWriter(ficheroSalida))) {
            File ficheroImagenActual;
            File directorioActual;
            for (int indexCategoria = 0; indexCategoria < categorias.size(); indexCategoria++) {
                directorioActual = new File(directorioImagenes.getPath() + "/" + categorias.get(indexCategoria));
                escritor.write(categorias.get(indexCategoria) + ";");
                if (modelo.getElementAt(indexCategoria).equals((String) modelo.getSelectedItem())) {
                    for (int indexImagen = 0; indexImagen < directorioActual.list().length - 1; indexImagen++) {
                        ficheroImagenActual = directorioActual.listFiles()[indexImagen];
                        ficheroImagenActual.renameTo(new File(directorioActual.getPath() + "/" + ((PanelImagen) panelImagenes.getComponent(indexImagen)).getNombre()));
                        escritor.write(ficheroImagenActual.getName() + ";");
                    }
                    ficheroImagenActual = directorioActual.listFiles()[directorioActual.listFiles().length - 1];
                    ficheroImagenActual.renameTo(new File(directorioActual.getPath() + "/" + ((PanelImagen) panelImagenes.getComponent(directorioActual.listFiles().length - 1)).getNombre()));

                    escritor.write(ficheroImagenActual.getName() + "\n");
                    directorioActual = new File(directorioImagenes.getPath() + "/" + categorias.get(indexCategoria));
                } else {
                    for (int indexImagen = 0; indexImagen < directorioActual.list().length - 1; indexImagen++) {
                        ficheroImagenActual = directorioActual.listFiles()[indexImagen];
                        escritor.write(ficheroImagenActual.getName() + ";");
                    }
                    ficheroImagenActual = directorioActual.listFiles()[directorioActual.listFiles().length - 1];

                    escritor.write(ficheroImagenActual.getName() + "\n");
                    directorioActual = new File(directorioImagenes.getPath() + "/" + categorias.get(indexCategoria));
                }
            }
            cargarImagenes();
            panelImagenes.revalidate();
            panelImagenes.repaint();
        } catch (IOException ex) {
            ex.printStackTrace();
        }

    }//GEN-LAST:event_btnGuardarActionPerformed

    void limpiarImagenesPanel() {
        panelImagenes.removeAll();
        panelImagenes.repaint();
    }

    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;

                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Principal.class
                    .getName()).log(java.util.logging.Level.SEVERE, null, ex);

        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Principal.class
                    .getName()).log(java.util.logging.Level.SEVERE, null, ex);

        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Principal.class
                    .getName()).log(java.util.logging.Level.SEVERE, null, ex);

        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Principal.class
                    .getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Principal().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnGuardar;
    private javax.swing.JComboBox<String> jComboBox1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JPanel panelImagenes;
    // End of variables declaration//GEN-END:variables

}
