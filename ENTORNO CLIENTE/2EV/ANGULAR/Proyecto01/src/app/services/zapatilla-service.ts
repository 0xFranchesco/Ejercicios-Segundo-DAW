import { Injectable, inject } from '@angular/core';
import { Zapatillas } from '../models/zapatillas';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class ZapatillaService {
  private http = inject(HttpClient);
  private baseUrl = 'http://localhost:3000/clientes';

  getAll(): Observable<Zapatillas[]> {
    return this.http.get<Zapatillas[]>(this.baseUrl);
  }

  create(cliente: Zapatillas): Observable<Zapatillas> {
    return this.http.post<Zapatillas>(this.baseUrl, cliente);
  }

  delete(id: number): Observable<void> {
    return this.http.delete<void>(`${this.baseUrl}/${id}`);
  }

  getByDni(id: string): Observable<Zapatillas[]> {
    return this.http.get<Zapatillas[]>(`${this.baseUrl}?id=${encodeURIComponent(id)}`);
  }
}