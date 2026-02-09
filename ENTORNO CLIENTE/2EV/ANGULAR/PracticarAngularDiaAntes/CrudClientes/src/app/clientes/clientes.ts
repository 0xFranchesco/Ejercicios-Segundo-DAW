import { Component } from '@angular/core';

@Component({
  selector: 'app-clientes',
  standalone: true,
  imports: [],
  templateUrl: './clientes.html',
  styleUrl: './clientes.css',
})
export class Clientes {

  dni: string = ''; 
  nombre: string = '';
  apellidos: string = '';
  email: string = '';
   
  constructor() { }


}
