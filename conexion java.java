/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package cuartocrudd;

/**
 *
 * @author ASUS GAMER
 */
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
public class conexion {
    Connection conect;
    public Connection conectar(){
        try {
            Class.forName("com.mysql.jdbc.Driver");
           conect= DriverManager.getConnection("jdbc:mysql://localhost:3306/cuarto", "root", "");
            //JOptionPane.showMessageDialog(null, "Estas conectado");
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null, ex);
        }
        return conect;
    }
}
/*
public void mostrarEstudiantes() {
        try {
            String titulos[] = {"cedula", "nombre", "apellido", "telefono", "direccion"};
            String registros[] = new String[5];
            DefaultTableModel modelo = new DefaultTableModel(titulos, 0);
            conexion conn = new conexion();
            Connection conectar = conn.conectar();
            String sql = "SELECT * FROM estudiantes";
            Statement st = conectar.createStatement();
            ResultSet rs = st.executeQuery(sql);
            while (rs.next()) {
                registros[0] = rs.getString("estCedula");
                registros[1] = rs.getString("estNombre");
                registros[2] = rs.getString("estApellido");
                registros[3] = rs.getString("estTelefono");
                registros[4] = rs.getString("estDireccion");
                modelo.addRow(registros);

            }
            jTable1.setModel(modelo);
        } catch (Exception ex) {
            JOptionPane.showMessageDialog(null, ex);
        }

*/
