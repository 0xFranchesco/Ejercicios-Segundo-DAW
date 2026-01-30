import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable()
export class PeticionesServices {
  
  public url: string;
  constructor( public _http: HttpClient ) {
    this.url = 'https://pokeapi.co/api/v2/pokemon/';
  }

  getUser(userId: number): Observable<any> {
    return this._http.get(this.url + userId);
  }

}
