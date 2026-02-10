import { Routes } from '@angular/router';
import { ZapatillasComponent } from './components/zapatillas-component/zapatillas-component';
import { NotFound } from './src/app/Components/not-found/not-found';
import { VideojuegoComponent } from './components/videojuego-component/videojuego-component';
import { Externo } from './components/externo/externo';

export const routes: Routes = [
    {path: '', component: ZapatillasComponent, pathMatch: 'full' },
    {path: 'zapatillas', component: ZapatillasComponent},
    {path: 'videojuegos', component: VideojuegoComponent},
    {path: 'externo', component: Externo},
    {path: '**', component: NotFound},

];
   