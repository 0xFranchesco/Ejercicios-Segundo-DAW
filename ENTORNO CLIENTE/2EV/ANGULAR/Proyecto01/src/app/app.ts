import { Component, signal } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { VideojuegoComponent } from './components/videojuego-component/videojuego-component';
import { ZapatillasComponent } from './components/zapatillas-component/zapatillas-component';
import { Configuracion } from './models/configuracion';

@Component({
  selector: 'app-root',
  imports: [
    RouterOutlet,
    VideojuegoComponent,
    ZapatillasComponent,
    CommonModule
  ],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App {
  protected readonly title = signal('Proyecto01');
}
