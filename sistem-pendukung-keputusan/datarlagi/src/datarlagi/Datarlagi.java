/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package datarlagi;

/**
 *
 * @author UNI
 */

import java.util.Scanner;
       
public class Datarlagi {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        System.out.println("PROGRAM BANGUN DATAR");
        System.out.println();
        
        int sisi, luas, keliling;
        
        System.out.println("HITUNG BANGUN SAMA SISI");
        Scanner O=new Scanner (System.in);
        System.out.print("Input Nilai sisi Bangunan : ");
        sisi=O.nextInt();
        luas=(sisi*sisi);
        System.out.println("Luas dari persegi adalah : "+luas);
        keliling=(4*sisi);
        System.out.println("Keliling dari persegi adalah : "+keliling);
     
        int panjang, lebar;
        System.out.println();
        System.out.println("MENGHITUNG BANGUN PERSEGI PANJANG");
        Scanner S = new Scanner (System.in);
        System.out.print("Input Nilai panjang Bangunan : ");
        panjang=S.nextInt();
       
        System.out.print("Input Nilai lebar Bangunan : ");
        lebar=S.nextInt();
       
        luas=(panjang*lebar);
        System.out.println("Luas persegi panjang adalah : "+luas);
       
        keliling=2*(panjang+lebar);
        System.out.println("Keliling persegi panjang adalah : "+keliling);
    }
}
