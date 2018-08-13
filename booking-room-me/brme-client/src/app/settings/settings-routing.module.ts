import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {AdminGuard, AuthGuard} from '../auth/services/auth-guard.service';
import {SettingsComponent} from './components/settings/settings.component';
import {AdminSettingsComponent} from './components/admin-settings/admin-settings.component';
import {AdminSettingsGuard} from './services/admin-settings-guard.service';

const routes: Routes = [
  { path: '', component: SettingsComponent, canActivate: [AuthGuard] },
  { path: 'admin', component: AdminSettingsComponent, canActivate: [AdminGuard] },
  { path: 'admin/:id', component: AdminSettingsComponent, canActivate: [AdminGuard, AdminSettingsGuard] }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class SettingsRoutingModule { }
