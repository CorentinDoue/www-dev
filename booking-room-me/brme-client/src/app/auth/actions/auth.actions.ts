import { Action } from '@ngrx/store';
import {Credentials, Session} from '../models/auth.model';
import {RouterNavigationAction} from '@ngrx/router-store';

export const SESS_KEY = 'SESS';

export enum AuthActionTypes {
  Login = '[Auth] Login',
  Logout = '[Auth] Logout',
  LoginSuccess = '[Auth] Login Success',
  LoginFailure = '[Auth] Login Failure',
  LoginRedirect = '[Auth] Login Redirect',
  ReloadSession = '[Auth] Reload and Check Session',
  ResetPwd = '[Auth] ResetPwd',
  ResetPwdSuccess = '[Auth] ResetPwd Success',
  ResetPwdFailure = '[Auth] ResetPwd Failure',
  SetPwd = '[Auth] SetPwd',
  SetPwdSuccess = '[Auth] SetPwd Success',
  SetPwdFailure = '[Auth] SetPwd Failure',
}

export class Login implements Action {
  readonly type = AuthActionTypes.Login;

  constructor(public payload: Credentials) {}
}

export class LoginSuccess implements Action {
  readonly type = AuthActionTypes.LoginSuccess;

  constructor(public payload: { session: Session }) {}
}

export class LoginFailure implements Action {
  readonly type = AuthActionTypes.LoginFailure;

  constructor(public payload: any) {}
}

export class LoginRedirect implements Action {
  readonly type = AuthActionTypes.LoginRedirect;
}

export class Logout implements Action {
  readonly type = AuthActionTypes.Logout;
}

export class ReloadSession implements Action {
  readonly type = AuthActionTypes.ReloadSession;

  constructor(public payload: { session: Session }) {}
}

export class SetPwd implements Action {
  readonly type = AuthActionTypes.SetPwd;

  constructor(public payload: Credentials) {}
}

export class SetPwdSuccess implements Action {
  readonly type = AuthActionTypes.SetPwdSuccess;

  constructor(public payload: string) {}
}

export class SetPwdFailure implements Action {
  readonly type = AuthActionTypes.SetPwdFailure;

  constructor(public payload: any) {}
}

export class ResetPwd implements Action {
  readonly type = AuthActionTypes.ResetPwd;

  constructor(public payload: Credentials) {}
}

export class ResetPwdSuccess implements Action {
  readonly type = AuthActionTypes.ResetPwdSuccess;

  constructor(public payload: string) {}
}

export class ResetPwdFailure implements Action {
  readonly type = AuthActionTypes.ResetPwdFailure;

  constructor(public payload: any) {}
}

export type AuthActionsUnion =
  | Login
  | LoginSuccess
  | LoginFailure
  | LoginRedirect
  | Logout
  | ReloadSession
  | ResetPwd
  | ResetPwdSuccess
  | ResetPwdFailure
  | SetPwd
  | SetPwdSuccess
  | SetPwdFailure
  | RouterNavigationAction;
