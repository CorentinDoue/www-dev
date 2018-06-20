import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import {NotFoundComponent} from './not-found/not-found.component';
import {HomeComponent} from './home/home.component';

const routes: Routes = [
  {
    path: '',
    component: HomeComponent
  },
  {
    path: 'home',
    component: HomeComponent
  },
  {
    path: 'cv',
    redirectTo: '',
    pathMatch: 'full'
  },
  {
    path: 'skills',
    redirectTo: '',
    pathMatch: 'full'
  },
  {
    path: 'projects',
    redirectTo: '',
    pathMatch: 'full'
  },
  {
    path: 'bio',
    redirectTo: '',
    pathMatch: 'full'
  },
  {
    path: 'hobbies',
    loadChildren: './hobbies/hobbies.module#HobbiesModule'
  },
  {
    path: '**',
    component: NotFoundComponent
  }
];

@NgModule({
  // useHash supports github.io demo page, remove in your app
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
