import { Component } from '@angular/core';
import { PeticionesServices } from '../../services/peticiones.service';
import { CommonModule, NgIf } from '@angular/common';
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
  public userId: number;
  constructor(private _peticionesServices: PeticionesServices) {
      this.userId = 40;

  }


  ngOnInit(): void {
    this._peticionesServices.getUser(this.userId).subscribe({
      next: (result) => {
        this.user = result;
      },
      error: (error) => {
        console.log(error);
      }
    });
  }
}
