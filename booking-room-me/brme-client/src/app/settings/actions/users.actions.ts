import { Action } from '@ngrx/store';
import {User} from '../models/user.model';


export enum UserAdminSettingsActionTypes {
  CreateUser = '[Admin Settings] Create User',
  CreateUserSuccess = '[Admin Settings] Create User Success',
  CreateUserFailure = '[Admin Settings] Create User Failure',
}

export class CreateUser implements Action {
  readonly type = UserAdminSettingsActionTypes.CreateUser;

  constructor(public payload: User) {}
}

export class CreateUserSuccess implements Action {
  readonly type = UserAdminSettingsActionTypes.CreateUserSuccess;

  constructor(public payload: any) {}
}

export class CreateUserFailure implements Action {
  readonly type = UserAdminSettingsActionTypes.CreateUserFailure;

  constructor(public payload: any) {}
}

export type UserAdminSettingsActionsUnion =
  | CreateUser
  | CreateUserSuccess
  | CreateUserFailure;
