import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Actions, Effect, ofType } from '@ngrx/effects';
import { of } from 'rxjs';
import {catchError, exhaustMap, map, switchMap, tap} from 'rxjs/operators';

import {
  SESS_KEY,
  AuthActionTypes, Login,
  LoginFailure,
  LoginSuccess, ReloadSession, Logout, ResetPwd, ResetPwdSuccess, ResetPwdFailure, SetPwd, SetPwdSuccess, SetPwdFailure,
} from '../actions/auth.actions';
import {Credentials, Session, SetPassword} from '../models/auth.model';
import { AuthService } from '../services/auth.service';
import {LocalStorageService} from '../../core/services/local-storage.service';
import {select, Store} from '@ngrx/store';
import * as fromAuth from '../reducers';

@Injectable()
export class AuthEffects {
  private redirect = true;

  @Effect()
  login$ = this.actions$.pipe(
    ofType<Login>(AuthActionTypes.Login),
    map(action => action.payload),
    exhaustMap((auth: Credentials) =>
      this.authService.login(auth).pipe(
        map(session => new LoginSuccess({ session })),
        catchError(error => of(new LoginFailure(error)))
      )
    )
  );

  @Effect()
  resetPwd$ = this.actions$.pipe(
    ofType<ResetPwd>(AuthActionTypes.ResetPwd),
    map(action => action.payload),
    exhaustMap((email) =>
      this.authService.resetPwd(email).pipe(
        map(success => new ResetPwdSuccess('Votre mot de passe a été réinitialiser, consultez votre boite mail')),
        catchError(error => of(new ResetPwdFailure(error)))
      )
    )
  );

  @Effect()
  setPwd$ = this.actions$.pipe(
    ofType<SetPwd>(AuthActionTypes.SetPwd),
    map(action => action.payload),
    switchMap((password: SetPassword) =>
      this.store.pipe(
        select(fromAuth.getSessionId),
        exhaustMap((id: number) =>
          this.authService.setPwd(password, id).pipe(
            map(success => new SetPwdSuccess('Votre mot de passe a été modifié avec succès')),
            catchError(error => of(new SetPwdFailure(error)))
          )
        )
      )
    )
  )

  @Effect({ dispatch: false })
  loginSuccess$ = this.actions$.pipe(
    ofType<LoginSuccess>(AuthActionTypes.LoginSuccess),
    tap((action) => {
      this.localStorageService.setItem(SESS_KEY, action.payload.session);
      if (this.redirect) {
        this.router.navigate(['/']);
      }
      this.redirect = true;
    })
  );

  @Effect({ dispatch: false })
  loginRedirect$ = this.actions$.pipe(
    ofType(AuthActionTypes.LoginRedirect, AuthActionTypes.Logout),
    tap(authed => {
      this.router.navigate(['/login']);
    })
  );

  @Effect({ dispatch: false })
  reloadSession$ = this.actions$.pipe(
    ofType<ReloadSession>(AuthActionTypes.ReloadSession),
    tap((action) => {
      if (this.authService.check_session(action.payload.session)) {
        this.redirect = false;
        this.store.dispatch(new LoginSuccess({session: action.payload.session}));
      } else {
        this.store.dispatch(new Logout());
      }
    })
  );

  @Effect({ dispatch: false })
  logout$ = this.actions$.pipe(
    ofType(AuthActionTypes.Logout),
    tap(() => {
      this.localStorageService.removeItem(SESS_KEY);
      this.router.navigate(['/']);
    })
  );

  constructor(
    private actions$: Actions,
    private authService: AuthService,
    private localStorageService: LocalStorageService,
    private router: Router,
    private store: Store<fromAuth.State>,
  ) {}
}
