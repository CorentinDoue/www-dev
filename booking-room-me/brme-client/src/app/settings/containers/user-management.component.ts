import { Component, OnInit } from '@angular/core';
import {User} from '../models/user.model';
import {Observable} from 'rxjs';
import {select, Store} from '@ngrx/store';
import {take, tap} from 'rxjs/operators';
import * as fromSettings from '../reducers';
import {DeleteUser, PutUser, SearchUser, SearchUserSort, SearchUserSwitchPage, SelectUser} from '../actions/users.actions';
import {JsonLdPage} from '../../core/models/json-ld.model';

@Component({
  selector: 'brme-user-management',
  template: `
    <brme-search [query]="searchQuery$ | async"
                 [searching]="loading$ | async"
                 [error]="error$ | async"
                 (search)="search($event)" title="Utilisateurs" placeholder="Rechercher un utilisateur">
    </brme-search>
    <brme-user-form *ngIf="selectedUser$ | async"
                    (submitted)="onSubmit($event)"
                    [pending]="ispending$ | async"
                    [errorMessage]="errorMessage$ | async"
                    [successMessage]="successMessage$ | async"
                    [user]="selectedUser$ | async"
                    [emailDisable]="true"
                    verb="Modifier">
    </brme-user-form>
    <brme-users-list [entities]="users$ | async"
                       [pages]="pages$ | async"
                       [totalItems]="totalItems$ | async"
                       type="user"
                       (goToPage)="goToPage($event)"
                       (sortChange)="sort($event)"
                       (deleted)="delete($event)"
                       (selected)="select($event)">
    </brme-users-list>
  `,
  styles: []
})
export class UserManagementComponent implements OnInit {

  searchQuery$: Observable<string>;
  users$: Observable<User[]>;
  loading$: Observable<boolean>;
  error$: Observable<string>;
  pages$: Observable<JsonLdPage>;
  totalItems$: Observable<number>;
  errorMessage$ = this.store.pipe(select(fromSettings.getUserFormError));
  successMessage$ = this.store.pipe(select(fromSettings.getUserFormSuccess));
  ispending$ = this.store.pipe(select(fromSettings.getUserFormPending));
  selectedUser$ = this.store.pipe(select(fromSettings.getSelectedUser));

  constructor(private store: Store<fromSettings.State>) {
    this.searchQuery$ = store.pipe(
      select(fromSettings.getUserSearchQuery),
      take(1)
    );
    this.users$ = store.pipe(select(fromSettings.getUserSearchResults));
    this.loading$ = store.pipe(select(fromSettings.getUserSearchLoading));
    this.error$ = store.pipe(select(fromSettings.getUserSearchError));
    this.pages$ = store.pipe(select(fromSettings.getUserSearchPages));
    this.totalItems$ = store.pipe(select(fromSettings.getUserSearchTotalItems));
  }

  search(query: string) {
    this.store.dispatch(new SearchUser(query));
  }

  goToPage(pagenumber) {
    this.store.dispatch(new SearchUserSwitchPage(pagenumber));
  }

  sort(sort) {
    this.store.dispatch(new SearchUserSort(sort));
  }

  delete(id) {
    this.store.dispatch(new DeleteUser(id));
  }

  select(id) {
    this.store.dispatch(new SelectUser(id));
  }

  ngOnInit(): void {
    this.store.dispatch(new SearchUser(''));
  }

  onSubmit(user: User) {
    this.store.dispatch(new PutUser(user));
  }
}
