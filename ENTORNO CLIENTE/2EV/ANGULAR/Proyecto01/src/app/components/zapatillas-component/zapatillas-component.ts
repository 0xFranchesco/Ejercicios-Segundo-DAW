import { Component, OnInit, inject } from '@angular/core';
import { Zapatillas } from '../../models/zapatillas';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { ZapatillaService } from '../../services/zapatilla-service';
import { ZapatillasServiceLocal } from '../../services/zapatillas-local';

@Component({
  selector: 'app-zapatillas-component',
  imports: [CommonModule, RouterModule],
  templateUrl: './zapatillas-component.html',
  styleUrl: './zapatillas-component.css',
})
export class ZapatillasComponent implements OnInit {

    titulo = 'Aquí están las zapatillas!';

    private zapatillasService = inject(ZapatillaService);
    private zapatillasServiceLocal = inject(ZapatillasServiceLocal);

//--------------LOCAL--------------

  zapatillas: Zapatillas[] = [];

  zapatillaNueva: Zapatillas = {
    Marca: '',
    Color: '',
    Modelo: '',
    Precio: 0,
    Stock: 0
  };

  cargarTodasLocal() {
    this.zapatillas = this.zapatillasServiceLocal.getAll();
  }

//--------------------------------

  cargando = false;
  error = '';

  //Cargo las de local porque aun no tengo el json server
  ngOnInit() {
    this.cargarTodasLocal();
  }

  cargarTodas() {
    this.cargando = true;

    this.zapatillasService.getAll().subscribe({
      next: (data) => {
        this.zapatillas = data;
        this.cargando = false;
      },
      error: () => {
        this.error = 'Error cargando zapatillas';
        this.cargando = false;
      }
    });
  }

  crear() {
    this.cargando = true;

    this.zapatillasService.create(this.zapatillaNueva).subscribe({
      next: () => {
        this.zapatillaNueva = {
          Marca: '',
          Color: '',
          Modelo: '',
          Precio: 0,
          Stock: 0
        };

        this.cargarTodas();
      },
      error: () => {
        this.error = 'Error creando zapatilla';
        this.cargando = false;
      }
    });
  }

  borrar(id?: number) {
    if (!id) return;

    this.cargando = true;

    this.zapatillasService.delete(id).subscribe({
      next: () => this.cargarTodas(),
      error: () => {
        this.error = 'Error borrando';
        this.cargando = false;
      }
    });
  }

}
