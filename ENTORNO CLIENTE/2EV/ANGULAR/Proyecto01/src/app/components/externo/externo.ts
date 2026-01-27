import { Component } from '@angular/core';
import { PeticionesServices } from '../../services/peticiones.service';
import { CommonModule } from '@angular/common';
import { OnInit } from '@angular/core';

@Component({
  selector: 'app-externo',
  imports: [],
  providers: [PeticionesServices],
  templateUrl: './externo.html',
  styleUrl: './externo.css',
})
export class Externo implements OnInit,CommonModule{

  public user: any;
  constructor(private _peticionesServices: PeticionesServices) {}

  ngOnInit(): void {
    this._peticionesServices.getUser().subscribe({
      next: (result) => {
        this.user = result.data;
      },
      error: (error) => {
        console.log(error);
      }
    });
  }
}
