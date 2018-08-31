import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {LoginComponent} from './components/login.component';
import {AuthGuard, LoginGuard} from './services/auth-guard.service';
import {ResetPwdComponent} from './components/reset-pwd.component';
import {SetPwdComponent} from './components/set-pwd.component';

const routes: Routes = [
  { path: 'login', component: LoginComponent, canActivate: [LoginGuard] },
  { path: 'reset-pwd', component: ResetPwdComponent, canActivate: [LoginGuard] },
  { path: 'settings', component: SetPwdComponent, canActivate: [AuthGuard] }
  ];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AuthRoutingModule {}
