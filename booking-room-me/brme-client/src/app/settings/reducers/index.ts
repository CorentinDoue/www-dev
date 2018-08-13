import * as fromLayout from './layout.reducer';
import * as fromUserForm from './user-form.reducer';
import * as fromRoot from '../../core/reducers';

import {ActionReducerMap, createFeatureSelector, createSelector} from '@ngrx/store';
import {getError, getPending, getSuccess} from './user-form.reducer';


export interface AdminSettingsState {
  layout: fromLayout.State;
  userform: fromUserForm.State;
}

export interface State extends fromRoot.State {
  adminsettings: AdminSettingsState;
}

export const reducers: ActionReducerMap<AdminSettingsState> = {
  layout: fromLayout.reducer,
  userform: fromUserForm.reducer
};

export const selectAdminSettingsState = createFeatureSelector<State, AdminSettingsState>('adminsettings');

export const selectTabSettingsSate = createSelector(
  selectAdminSettingsState,
  (settingsSate: AdminSettingsState) => settingsSate.layout.adminSetting.id
);

export const selectUserFormState = createSelector(
  selectAdminSettingsState,
  (settingsSate: AdminSettingsState) => settingsSate.userform
);

export const getUserFormError = createSelector(
  selectUserFormState,
  getError
);

export const getUserFormSuccess = createSelector(
  selectUserFormState,
  getSuccess
);

export const getUserFormPending = createSelector(
  selectUserFormState,
  getPending
);
