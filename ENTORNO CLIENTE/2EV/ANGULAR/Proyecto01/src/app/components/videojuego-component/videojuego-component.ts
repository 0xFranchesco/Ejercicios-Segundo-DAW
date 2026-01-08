import { Component, OnInit, DoCheck } from '@angular/core';

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

  public cambiarTitulo(miTitulo:string): void {

   this.titulo = miTitulo;

  };

}
