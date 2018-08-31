import {
  createSelector,
  createFeatureSelector,
  ActionReducerMap,
} from '@ngrx/store';
import * as fromRoot from '../../core/reducers';
import * as fromAuth from './auth.reducer';
import * as fromLoginPage from './login-page.reducer';
import * as fromResetPwdPage from './reset-pwd-page.reducer';
import * as fromSetPwdPage from './set-pwd-page.reducer';

export interface AuthState {
  status: fromAuth.State;
  loginPage: fromLoginPage.State;
  resetPwdPage: fromResetPwdPage.State;
  setPwdPage: fromSetPwdPage.State;
}

export interface State extends fromRoot.State {
  auth: AuthState;
}

export const reducers: ActionReducerMap<AuthState> = {
  status: fromAuth.reducer,
  loginPage: fromLoginPage.reducer,
  resetPwdPage: fromResetPwdPage.reducer,
  setPwdPage: fromSetPwdPage.reducer,
};

export const selectAuthState = createFeatureSelector<State, AuthState>('auth');

export const selectAuthStatusState = createSelector(
  selectAuthState,
  (state: AuthState) => state.status
);
export const getLoggedIn = createSelector(
  selectAuthStatusState,
  fromAuth.getLoggedIn
);
export const getSession = createSelector(
  selectAuthStatusState,
  fromAuth.getSession
);

export const getSessionToken = createSelector(
  getSession,
  state => state === null ? null : state.token
);

export const getSessionRoom1 = createSelector(
  getSession,
  state => state === null ? null : state.room1
);

export const getSessionRoom2 = createSelector(
  getSession,
  state => state === null ? null : state.room2
);

export const getSessionRoom3 = createSelector(
  getSession,
  state => state === null ? null : state.room3
);

export const getSessionId = createSelector(
  getSession,
  state => state === null ? null : state.id
);

export const selectLoginPageState = createSelector(
  selectAuthState,
  (state: AuthState) => state.loginPage
);
export const getLoginPageError = createSelector(
  selectLoginPageState,
  fromLoginPage.getError
);
export const getLoginPagePending = createSelector(
  selectLoginPageState,
  fromLoginPage.getPending
);

export const selectResetPwdPageState = createSelector(
  selectAuthState,
  (state: AuthState) => state.resetPwdPage
);
export const getResetPwdPageError = createSelector(
  selectResetPwdPageState,
  fromResetPwdPage.getError
);

export const getResetPwdPagePending = createSelector(
  selectResetPwdPageState,
  fromResetPwdPage.getPending
);

export const getResetPwdPageSuccess = createSelector(
  selectResetPwdPageState,
  fromResetPwdPage.getSuccess
);


export const selectSetPwdPageState = createSelector(
  selectAuthState,
  (state: AuthState) => state.setPwdPage
);
export const getSetPwdPageError = createSelector(
  selectSetPwdPageState,
  fromSetPwdPage.getError
);

export const getSetPwdPagePending = createSelector(
  selectSetPwdPageState,
  fromSetPwdPage.getPending
);

export const getSetPwdPageSuccess = createSelector(
  selectSetPwdPageState,
  fromSetPwdPage.getSuccess
);

