import { Component, OnInit } from '@angular/core';
import {select, Store} from '@ngrx/store';
import * as fromSettings from '../reducers/index';
import {CreateUser} from '../actions/users.actions';

@Component({
  selector: 'brme-user-new',
  template: `<brme-user-form (submitted)="onSubmit($event)"
                             [pending]="ispending$ | async"
                             [errorMessage]="errorMessage$ | async"
                             [successMessage]="successMessage$ | async"
                             verb="Créer">
              </brme-user-form>`,
  styles: []
})
export class UserNewComponent implements OnInit {

  errorMessage$ = this.store.pipe(select(fromSettings.getUserFormError));
  successMessage$ = this.store.pipe(select(fromSettings.getUserFormSuccess));
  ispending$ = this.store.pipe(select(fromSettings.getUserFormPending));

  constructor(private store: Store<fromSettings.State>) { }

  ngOnInit() {

  }

  onSubmit(event) {
    this.store.dispatch(new CreateUser(event));
  }

}
