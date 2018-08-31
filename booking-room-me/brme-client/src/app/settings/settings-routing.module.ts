import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {AdminGuard, AuthGuard} from '../auth/services/auth-guard.service';
import {AdminSettingsComponent} from './containers/admin-settings/admin-settings.component';
import {AdminSettingsGuard} from './services/admin-settings-guard.service';

const routes: Routes = [
  { path: 'admin', component: AdminSettingsComponent, canActivate: [AdminGuard] },
  { path: 'admin/:id', component: AdminSettingsComponent, canActivate: [AdminGuard, AdminSettingsGuard] }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class SettingsRoutingModule { }
