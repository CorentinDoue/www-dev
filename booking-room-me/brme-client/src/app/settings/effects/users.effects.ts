import { Injectable } from '@angular/core';
import { Actions, Effect, ofType } from '@ngrx/effects';
import {asyncScheduler, EMPTY, empty, Observable, of} from 'rxjs';
import {catchError, debounceTime, exhaustMap, map, skip, switchMap, take, takeUntil, tap} from 'rxjs/operators';

import {
  CreateUser,
  CreateUserFailure,
  CreateUserSuccess, DeleteUser, DeleteUserFailure, DeleteUserSuccess, PutUser, PutUserFailure, PutUserSuccess, SearchUser,
  SearchUserComplete,
  SearchUserError, SearchUserSort, SearchUserSwitchPage,
  UserAdminSettingsActionTypes
} from '../actions/users.actions';
import {User} from '../models/user.model';
import {UserService} from '../../core/services/user.service';
import {Action, select, Store} from '@ngrx/store';
import {JsonLdService} from '../../core/services/json-ld.service';
import * as fromSettings from '../reducers';


@Injectable()
export class UserAdminSettingsEffects {

  @Effect()
  createuser$ = this.actions$.pipe(
    ofType<CreateUser>(UserAdminSettingsActionTypes.CreateUser),
    map(action => action.payload),
    exhaustMap((user: User) =>
      this.userService.create(user).pipe(
        map(sucess => new CreateUserSuccess('Utilisateur créé avec succès')),
        catchError(error => of(new CreateUserFailure(error)))
      )
    )
  );

  @Effect()
  deleteuser$ = this.actions$.pipe(
    ofType<DeleteUser>(UserAdminSettingsActionTypes.DeleteUser),
    map(action => action.payload),
    exhaustMap((id: number) =>
      this.userService.delete(id).pipe(
        map(sucess => new DeleteUserSuccess({message: 'Utilisateur supprimé avec succès', id: id})),
        catchError(error => of(new DeleteUserFailure(error)))
      )
    )
  );

  @Effect()
  putuser$ = this.actions$.pipe(
    ofType<PutUser>(UserAdminSettingsActionTypes.PutUser),
    map(action => action.payload),
    exhaustMap((user: User) =>
      this.userService.put(user).pipe(
        map(user => new PutUserSuccess({message: 'Utilisateur modifié avec succès', user: user})),
        catchError(error => of(new PutUserFailure(error)))
      )
    )
  );

  @Effect()
  search$ = ({ debounce = 300, scheduler = asyncScheduler } = {}): Observable<Action> =>
    this.actions$.pipe(
      ofType<SearchUser>(UserAdminSettingsActionTypes.SearchUser),
      debounceTime(debounce, scheduler),
      map(action => action.payload),
      switchMap(query => {
        console.log('search query floor');
        const nextSearch$ = this.actions$.pipe(
          ofType(UserAdminSettingsActionTypes.SearchUserSwitchPage,
            UserAdminSettingsActionTypes.SearchUser,
            UserAdminSettingsActionTypes.SearchUserSort),
          skip(1)
        );
        return this.store.pipe(
          select(fromSettings.getUserSearchSort),
          takeUntil(nextSearch$),
          take(1),
          switchMap(sort => {
            console.log('search sort floor');
            return this.userService.search(query, sort).pipe(
              takeUntil(nextSearch$),
              map(response => this.jsonLdService.parseCollection<User>(response)),
              map((response) => new SearchUserComplete(response)),
              catchError(err => of(new SearchUserError(err)))
            );
          })
        );
      })
    )


  @Effect()
  switchpage$ = ({ debounce = 300, scheduler = asyncScheduler } = {}): Observable<Action> =>
    this.actions$.pipe(
      ofType<SearchUserSwitchPage>(UserAdminSettingsActionTypes.SearchUserSwitchPage),
      debounceTime(debounce, scheduler),
      map(action => action.payload),
      switchMap(page => {
        const nextSearch$ = this.actions$.pipe(
          ofType(UserAdminSettingsActionTypes.SearchUserSwitchPage,
            UserAdminSettingsActionTypes.SearchUser,
            UserAdminSettingsActionTypes.SearchUserSort),
          skip(1)
        );
        return this.store.pipe(
          select(fromSettings.getUserSearchQuery),
          takeUntil(nextSearch$),
          take(1),
          tap(query => console.log(query)),
          switchMap(query => {
            return this.store.pipe(
              select(fromSettings.getUserSearchSort),
              takeUntil(nextSearch$),
              take(1),
              switchMap(sort => {
                return this.userService.search(query, sort, page).pipe(
                  takeUntil(nextSearch$),
                  map(response => this.jsonLdService.parseCollection<User>(response)),
                  map((response) => new SearchUserComplete(response)),
                  catchError(err => of(new SearchUserError(err)))
                );
              })
              );
          })
          );
      })
    )

  @Effect()
  sort$ = ({ debounce = 300, scheduler = asyncScheduler } = {}): Observable<Action> =>
    this.actions$.pipe(
      ofType<SearchUserSort>(UserAdminSettingsActionTypes.SearchUserSort),
      debounceTime(debounce, scheduler),
      map(action => action.payload),
      switchMap(sort => {
        const nextSearch$ = this.actions$.pipe(
          ofType(UserAdminSettingsActionTypes.SearchUser,
            UserAdminSettingsActionTypes.SearchUserSort,
            UserAdminSettingsActionTypes.SearchUserSwitchPage),
          skip(1)
        );

        return this.store.pipe(
          select(fromSettings.getUserSearchQuery),
          takeUntil(nextSearch$),
          take(1),
          switchMap(query => {
            return this.userService.search(query, sort).pipe(
              takeUntil(nextSearch$),
              map(response => this.jsonLdService.parseCollection<User>(response)),
              map((response) => new SearchUserComplete(response)),
              catchError(err => of(new SearchUserError(err)))
            );
          })
        );
      })
    )

  constructor(
    private actions$: Actions,
    private userService: UserService,
    private jsonLdService: JsonLdService,
    private store: Store<fromSettings.State>
  ) {}
}
