import { Component, signal } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink, RouterOutlet } from '@angular/router';
import { VideojuegoComponent } from './components/videojuego-component/videojuego-component';
import { ZapatillasComponent } from './components/zapatillas-component/zapatillas-component';
import { Configuracion } from './models/configuracion';
import { Externo } from './components/externo/externo';

@Component({
  selector: 'app-root',
  imports: [
    RouterOutlet,
    RouterLink,
    VideojuegoComponent,
    ZapatillasComponent,
    Externo,
    CommonModule
  ],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App {
  protected readonly title = signal('Proyecto01');
}
