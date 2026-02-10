import { Injectable, inject } from '@angular/core';
import { Zapatillas } from '../models/zapatillas';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class ZapatillaService {
  private http = inject(HttpClient);
  private baseUrl = 'http://localhost:3000/zapatillas';

  getAll(): Observable<Zapatillas[]> {
    return this.http.get<Zapatillas[]>(this.baseUrl);
  }

  create(zapatilla: Zapatillas): Observable<Zapatillas> {
    return this.http.post<Zapatillas>(this.baseUrl, zapatilla);
  }

  delete(id: number): Observable<void> {
    return this.http.delete<void>(`${this.baseUrl}/${id}`);
  }

  getById(id: string): Observable<Zapatillas> {
       return this.http.get<Zapatillas>(`${this.baseUrl}/${id}`);
  }
}