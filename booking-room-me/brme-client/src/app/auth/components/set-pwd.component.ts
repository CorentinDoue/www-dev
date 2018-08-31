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
  selector: 'brme-set-pwd',
  template: `
    <div class="container">
      <brme-set-pwd-form (submitted)="onSubmit($event)"
                           [pending]="pending$ | async"
                           [errorMessage]="error$ | async"
                           [successMessage]="success$ | async">
      </brme-set-pwd-form>
    </div>
  `,
  styleUrls: []
})
export class SetPwdComponent implements OnInit {

  pending$ = this.store.pipe(select(fromAuth.getSetPwdPagePending));
  error$ = this.store.pipe(select(fromAuth.getSetPwdPageError));
  success$ = this.store.pipe(select(fromAuth.getSetPwdPageSuccess));

  constructor(private store: Store<fromAuth.State>) {}

  ngOnInit() {}

  onSubmit($event) {
    this.store.dispatch(new AuthActions.SetPwd($event));
  }

}
