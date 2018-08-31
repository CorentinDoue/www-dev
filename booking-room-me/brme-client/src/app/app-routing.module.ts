import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import {NotFoundPageComponent} from './core/components/not-found-page.component';

const routes: Routes = [

  {
    path: '',
    loadChildren: './bookings/bookings.module#BookingsModule'
  },
  {
    path: 'settings',
    loadChildren: './settings/settings.module#SettingsModule'
  },
  { path: '**', component: NotFoundPageComponent }
];

@NgModule({
  // useHash supports github.io demo page, remove in your app-component
  imports: [RouterModule.forRoot(routes, {onSameUrlNavigation: 'reload'})],
  exports: [RouterModule]
})
export class AppRoutingModule {}
