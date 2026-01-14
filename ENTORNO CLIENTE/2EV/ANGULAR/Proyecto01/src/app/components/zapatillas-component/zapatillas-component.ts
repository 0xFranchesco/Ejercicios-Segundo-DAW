import { Component, OnInit } from '@angular/core';
import { Zapatillas } from '../../models/zapatillas';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-zapatillas-component',
  imports: [CommonModule],
  templateUrl: './zapatillas-component.html',
  styleUrl: './zapatillas-component.css',
})
export class ZapatillasComponent implements OnInit {

  public titulo: string = "Aqui estan las zapatillas!";

  public listado: string = "Pues un listado de zapatillas";

  public zapatillas: Array<Zapatillas>;

  constructor() {
    this.zapatillas = [

      new Zapatillas("Nike", "Blanco", "Air Max",120, 29),
      new Zapatillas("Adidas", "Negro", "Ultraboost",65, 35),
      new Zapatillas("Puma", "Rojo", "Suede Classic", 40.99, 10),
      new Zapatillas("Reebok", "Azul", "Club C 85", 19.99, 5),
      new Zapatillas("New Balance", "Gris", "574", 39.99, 15),
    ];
  }

  ngOnInit(): void {
    console.log("Componente de zapatillas cargado");
  }

  

}
