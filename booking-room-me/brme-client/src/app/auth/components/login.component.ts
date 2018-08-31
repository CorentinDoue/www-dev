import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {ActivatedRoute, Router} from '@angular/router';
import {AuthService} from '../services/auth.service';
import {first} from 'rxjs/operators';
import {Credentials} from '../models/auth.model';
import {select, Store} from '@ngrx/store';
import * as fromAuth from '../reducers/index';
import * as AuthActions from '../actions/auth.actions';

@Component({
  selector: 'brme-login',
  template: `
    <div class="container">
      <brme-login-form (submitted)="onSubmit($event)" [pending]="pending$ | async" [errorMessage]="error$ | async"></brme-login-form>
    </div>
  `,
  styleUrls: []
})
export class LoginComponent implements OnInit {

  pending$ = this.store.pipe(select(fromAuth.getLoginPagePending));
  error$ = this.store.pipe(select(fromAuth.getLoginPageError));

  constructor(private store: Store<fromAuth.State>) {}

  ngOnInit() {}

  onSubmit($event: Credentials) {
    this.store.dispatch(new AuthActions.Login($event));
  }

}
