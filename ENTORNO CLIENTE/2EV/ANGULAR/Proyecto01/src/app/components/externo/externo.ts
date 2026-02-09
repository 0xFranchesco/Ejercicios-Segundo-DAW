import { Component } from '@angular/core';
import { PeticionesServices } from '../../services/peticiones.service';
import { FormsModule } from '@angular/forms';
import { ChangeDetectorRef } from '@angular/core';


@Component({
  selector: 'app-externo',
  imports: [FormsModule],
  providers: [PeticionesServices],
  templateUrl: './externo.html',
  styleUrl: './externo.css',
})

export class Externo {

  public user: any;
  public userId: number = 1;
  constructor(private _peticionesServices: PeticionesServices, private cdr: ChangeDetectorRef) {
  }


  buscar() {
    this._peticionesServices.getUser(this.userId).subscribe({
      next: (result) => {
        this.user = result;
        this.cdr.markForCheck();
      },
      error: (error) => {
        console.log(error);
      }
    });
  }
}
