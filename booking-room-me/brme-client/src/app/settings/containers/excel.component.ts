import { Component, OnInit } from '@angular/core';
import {select, Store} from '@ngrx/store';
import * as fromSettings from '../reducers/index';
import {UploadExcel} from '../actions/excel.actions';

@Component({
  selector: 'brme-excel',
  template: `
    <brme-excel-form *ngIf="(state$ | async) === 0" [errorMessage]="error$ | async" (submitted)="onSubmit($event)"></brme-excel-form>
    <brme-excel-pending *ngIf="(state$ | async) === 1 || (state$ | async) === 2 || (state$ | async) === 3"
                        [error]="error$ | async"
                        [message]="message$ | async"
                        [pending]="pending$ | async">
    </brme-excel-pending>
    <brme-excel-success *ngIf="(state$ | async) === 4"
                       [success]="success$ | async"
                       [message]="message$ | async">
    </brme-excel-success>
  `,
  styles: []
})
export class ExcelComponent implements OnInit {

  error$ = this.store.pipe(select(fromSettings.selectExcelError));
  success$ = this.store.pipe(select(fromSettings.selectExcelSuccess));
  pending$ = this.store.pipe(select(fromSettings.selectExcelPending));
  message$ = this.store.pipe(select(fromSettings.selectExcelMessage));
  state$ = this.store.pipe(select(fromSettings.selectExcelStateState));

  constructor(private store: Store<fromSettings.State>) { }

  ngOnInit() {}

  onSubmit(event) {
    console.log(event);
    this.store.dispatch(new UploadExcel(event));
  }

}
