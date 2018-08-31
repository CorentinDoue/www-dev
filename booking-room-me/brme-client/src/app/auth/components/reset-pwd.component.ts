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
  selector: 'brme-reset-pwd',
  template: `
    <div class="container">
      <brme-reset-pwd-form (submitted)="onSubmit($event)"
                           [pending]="pending$ | async"
                           [errorMessage]="error$ | async"
                           [successMessage]="success$ | async">
      </brme-reset-pwd-form>
    </div>
  `,
  styleUrls: []
})
export class ResetPwdComponent implements OnInit {

  pending$ = this.store.pipe(select(fromAuth.getResetPwdPagePending));
  error$ = this.store.pipe(select(fromAuth.getResetPwdPageError));
  success$ = this.store.pipe(select(fromAuth.getResetPwdPageSuccess));

  constructor(private store: Store<fromAuth.State>) {}

  ngOnInit() {}

  onSubmit($event) {
    this.store.dispatch(new AuthActions.ResetPwd($event));
  }

}
