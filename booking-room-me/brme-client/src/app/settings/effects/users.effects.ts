import { Injectable } from '@angular/core';
import { Actions, Effect, ofType } from '@ngrx/effects';
import { of } from 'rxjs';
import { catchError, exhaustMap, map, tap } from 'rxjs/operators';

import {CreateUser, CreateUserFailure, CreateUserSuccess, UserAdminSettingsActionTypes} from '../actions/users.actions';
import {User} from '../models/user.model';
import {UserService} from '../../core/services/user.service';


@Injectable()
export class UserAdminSettingsEffects {

  @Effect()
  login$ = this.actions$.pipe(
    ofType<CreateUser>(UserAdminSettingsActionTypes.CreateUser),
    map(action => action.payload),
    exhaustMap((user: User) =>
      this.userService.create(user).pipe(
        map(sucess => new CreateUserSuccess('Utilisateur créé avec succès')),
        catchError(error => of(new CreateUserFailure(error)))
      )
    )
  );

  constructor(
    private actions$: Actions,
    private userService: UserService,
  ) {}
}
