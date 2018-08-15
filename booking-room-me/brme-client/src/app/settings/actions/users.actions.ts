import { Action } from '@ngrx/store';
import {User} from '../models/user.model';
import {JsonLdCollection} from '../../core/models/json-ld.model';
import {Sort} from '@angular/material';
import {Update} from '@ngrx/entity';
import {RouterNavigationAction} from '@ngrx/router-store';


export enum UserAdminSettingsActionTypes {
  CreateUser = '[Admin Settings] Create User',
  CreateUserSuccess = '[Admin Settings] Create User Success',
  CreateUserFailure = '[Admin Settings] Create User Failure',
  SearchUser = '[Admin Settings] Search User',
  SearchUserSwitchPage = '[Admin Settings] Search User Switch Page',
  SearchUserSort = '[Admin Settings] Search User Sort',
  SearchUserComplete = '[Admin Settings] Search User Complete',
  SearchUserError = '[Admin Settings] Search User Error',
  LoadUser = '[Admin Settings] Load User',
  SelectUser = '[Admin Settings] Select User',
  DeleteUser = '[Admin Settings] Delete User',
  DeleteUserSuccess = '[Admin Settings] Delete User Success',
  DeleteUserFailure = '[Admin Settings] Delete User Failure',
  PutUser = '[Admin Settings] Put User',
  PutUserSuccess = '[Admin Settings] Put User Success',
  PutUserFailure = '[Admin Settings] Put User Failure',
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

export class SearchUser implements Action {
  readonly type = UserAdminSettingsActionTypes.SearchUser;

  constructor(public payload: string) {}
}

export class SearchUserSwitchPage implements Action {
  readonly type = UserAdminSettingsActionTypes.SearchUserSwitchPage;

  constructor(public payload: number) {}
}

export class SearchUserSort implements Action {
  readonly type = UserAdminSettingsActionTypes.SearchUserSort;

  constructor(public payload: Sort) {}
}

export class SearchUserComplete implements Action {
  readonly type = UserAdminSettingsActionTypes.SearchUserComplete;

  constructor(public payload: JsonLdCollection<User>) {}
}

export class SearchUserError implements Action {
  readonly type = UserAdminSettingsActionTypes.SearchUserError;

  constructor(public payload: string) {}
}

export class LoadUser implements Action {
  readonly type = UserAdminSettingsActionTypes.LoadUser;

  constructor(public payload: User) {}
}

export class SelectUser implements Action {
  readonly type = UserAdminSettingsActionTypes.SelectUser;

  constructor(public payload: string) {}
}

export class DeleteUser implements Action {
  readonly type = UserAdminSettingsActionTypes.DeleteUser;

  constructor(public payload: number) {}
}

export class DeleteUserSuccess implements Action {
  readonly type = UserAdminSettingsActionTypes.DeleteUserSuccess;

  constructor(public payload: {message: string, id: number} ) {}
}

export class DeleteUserFailure implements Action {
  readonly type = UserAdminSettingsActionTypes.DeleteUserFailure;

  constructor(public payload: any) {}
}

export class PutUser implements Action {
  readonly type = UserAdminSettingsActionTypes.PutUser;

  constructor(public payload: User) {}
}

export class PutUserSuccess implements Action {
  readonly type = UserAdminSettingsActionTypes.PutUserSuccess;

  constructor(public payload: {message: string, user: User } ) {}
}

export class PutUserFailure implements Action {
  readonly type = UserAdminSettingsActionTypes.PutUserFailure;

  constructor(public payload: any) {}
}

export type UserAdminSettingsActionsUnion =
  | CreateUser
  | CreateUserSuccess
  | CreateUserFailure
  | SearchUser
  | SearchUserSwitchPage
  | SearchUserSort
  | SearchUserComplete
  | SearchUserError
  | LoadUser
  | SelectUser
  | DeleteUser
  | DeleteUserSuccess
  | DeleteUserFailure
  | PutUser
  | PutUserSuccess
  | PutUserFailure
  | RouterNavigationAction;
