import {ModuleWithProviders, NgModule} from '@angular/core';
import { LoginComponent } from './components/login.component';
import {SharedModule} from '../shared/shared.module';
import {AuthService} from './services/auth.service';
import {AdminGuard, AuthGuard, LoginGuard} from './services/auth-guard.service';
import {AuthRoutingModule} from './auth-routing.module';
import {StoreModule} from '@ngrx/store';
import {EffectsModule} from '@ngrx/effects';
import {AuthEffects} from './effects/auth.effects';
import {reducers} from './reducers';
import { LoginFormComponent } from './components/login-form/login-form.component';
import {HTTP_INTERCEPTORS} from '@angular/common/http';
import {JwtInterceptor} from './services/jwt.interceptor';
import {ErrorInterceptor} from './services/error.interceptor';
import {ResetPwdComponent} from './components/reset-pwd.component';
import {ResetPwdFormComponent} from './components/reset-pwd-form/reset-pwd-form.component';
import {SetPwdComponent} from './components/set-pwd.component';
import {SetPwdFormComponent} from './components/set-pwd-form/set-pwd-form.component';

@NgModule({
  imports: [SharedModule],
  declarations: [LoginComponent, LoginFormComponent, ResetPwdComponent, ResetPwdFormComponent, SetPwdComponent, SetPwdFormComponent],
})
export class AuthModule {
  static forRoot(): ModuleWithProviders {
    return {
      ngModule: RootAuthModule,
      providers: [
        AuthService,
        AuthGuard,
        LoginGuard,
        AdminGuard,
        { provide: HTTP_INTERCEPTORS, useClass: JwtInterceptor, multi: true },
        { provide: HTTP_INTERCEPTORS, useClass: ErrorInterceptor, multi: true },
      ],
    };
  }
}

@NgModule({
  imports: [
    AuthModule,
    AuthRoutingModule,
    StoreModule.forFeature('auth', reducers),
    EffectsModule.forFeature([AuthEffects]),
  ],
})
export class RootAuthModule {}
