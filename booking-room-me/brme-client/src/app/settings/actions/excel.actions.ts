import { Action } from '@ngrx/store';
import { RouterNavigationAction} from '@ngrx/router-store';
import {Excel, ExcelDTO} from '../models/excel.model';



export enum ExcelAdminSettingsActionTypes {
  UploadExcel = '[Admin Settings] Upload Excel',
  UploadExcelSuccess = '[Admin Settings] Upload Excel Success',
  ParseExcel = '[Admin Settings] Parse Excel',
  ParseExcelSuccess = '[Admin Settings] Parse Excel Success',
  DeleteExcel = '[Admin Settings] Delete Excel',
  DeleteExcelSuccess = '[Admin Settings] Delete Excel Success',
  ExcelFailure = '[Admin Settings] Excel Failure',
}

export class UploadExcel implements Action {
  readonly type = ExcelAdminSettingsActionTypes.UploadExcel;

  constructor(public payload: Excel) {}
}

export class UploadExcelSuccess implements Action {
  readonly type = ExcelAdminSettingsActionTypes.UploadExcelSuccess;

  constructor(public payload: ExcelDTO) {}
}


export class ParseExcel implements Action {
  readonly type = ExcelAdminSettingsActionTypes.ParseExcel;

  constructor(public payload: number) {}
}

export class ParseExcelSuccess implements Action {
  readonly type = ExcelAdminSettingsActionTypes.ParseExcelSuccess;

  constructor(public payload: number) {}
}


export class DeleteExcel implements Action {
  readonly type = ExcelAdminSettingsActionTypes.DeleteExcel;

  constructor(public payload: number) {}
}

export class DeleteExcelSuccess implements Action {
  readonly type = ExcelAdminSettingsActionTypes.DeleteExcelSuccess;

  constructor(public payload: number ) {}
}


export class ExcelFailure implements Action {
  readonly type = ExcelAdminSettingsActionTypes.ExcelFailure;

  constructor(public payload: any) {}
}

export type ExcelAdminSettingsActionsUnion =
  | UploadExcel
  | UploadExcelSuccess
  | ParseExcel
  | ParseExcelSuccess
  | DeleteExcel
  | DeleteExcelSuccess
  | ExcelFailure
  | RouterNavigationAction;
