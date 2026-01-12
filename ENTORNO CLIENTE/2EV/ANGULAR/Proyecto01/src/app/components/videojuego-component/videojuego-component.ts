import { Component, OnInit, DoCheck } from '@angular/core';
import { OnDestroy } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-videojuego-component',
  imports: [],
  templateUrl: './videojuego-component.html',
  styleUrl: './videojuego-component.css',
})
export class VideojuegoComponent implements OnInit, DoCheck {

  public titulo: string = "Aqui estan los videojuegos!";

  public listado: string = "Pues un listado";

  ngOnInit(): void {
    console.log("Componente de videojuego cargado");
  }

  ngDoCheck(): void {
    console.log("Se ha detectado un cambio en el componente de videojuego");
  }

  ngOnDestroy(): void {
    if (!this.mostrarVideojuegos) {
    console.log("Se ha elimnado el componente de videojuego");
    }
  }

  mostrarVideojuegos: boolean = true;

  public cambiarMostrarVideojuegos(): void {
    this.mostrarVideojuegos = !this.mostrarVideojuegos;
  }

  public cambiarTitulo(miTitulo:string): void {
   this.titulo = miTitulo;
  };

}
