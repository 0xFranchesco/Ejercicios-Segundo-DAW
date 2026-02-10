import { Injectable } from '@angular/core';
import { Zapatillas } from '../models/zapatillas';

@Injectable({ providedIn: 'root' })
export class ZapatillasServiceLocal {
  private zapatillas: Zapatillas[] = [
    { Marca: 'Nike', Color: 'Blanco', Modelo: 'Air Max', Precio: 120, Stock: 29 },
    { Marca: 'Adidas', Color: 'Negro', Modelo: 'Ultraboost', Precio: 65, Stock: 35 },
    { Marca: 'Puma', Color: 'Rojo', Modelo: 'Suede Classic', Precio: 40.99, Stock: 10 },
    { Marca: 'Reebok', Color: 'Azul', Modelo: 'Club C 85', Precio: 19.99, Stock: 5 },
    { Marca: 'New Balance', Color: 'Gris', Modelo: '574', Precio: 39.99, Stock: 15 },
  ];

  getAll(): Zapatillas[] {
    return this.zapatillas;
  }

  // Bonus “examen”: para que puedas añadir luego
  add(z: Zapatillas): void {
    this.zapatillas = [...this.zapatillas, z];
  }

  // Bonus “examen”: borrar por Modelo (o por id si lo usas)
  deleteByModelo(Modelo: string): void {
    this.zapatillas = this.zapatillas.filter(z => z.Modelo !== Modelo);
  }
}
