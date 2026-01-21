import { Routes } from '@angular/router';
import { ZapatillasComponent } from './components/zapatillas-component/zapatillas-component';
import { NotFound } from './src/app/Components/not-found/not-found';
import { VideojuegoComponent } from './components/videojuego-component/videojuego-component';

export const routes: Routes = [
    {path: '', component: ZapatillasComponent, pathMatch: 'full' },
    {path: 'videojuegos', component: VideojuegoComponent},
    {path: '**', component: NotFound},
];
