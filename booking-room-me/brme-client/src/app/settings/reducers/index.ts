import * as fromLayout from './layout.reducer';
import * as fromUserForm from './user-form.reducer';
import * as fromUserSearch from './user-search.reducer';
import * as fromUsers from './users.reducer';
import * as fromRoot from '../../core/reducers';
import * as fromRoomForm from './room-form.reducer';
import * as fromRoomSearch from './room-search.reducer';
import * as fromExcel from './excel.reducer';

import {ActionReducerMap, createFeatureSelector, createSelector} from '@ngrx/store';
import {getError, getPending, getSuccess} from './user-form.reducer';


export interface AdminSettingsState {
  layout: fromLayout.State;
  userform: fromUserForm.State;
  usersearch: fromUserSearch.State;
  users: fromUsers.State;
  roomform: fromRoomForm.State;
  roomsearch: fromRoomSearch.State;
  excel: fromExcel.State;
}

export interface State extends fromRoot.State {
  adminsettings: AdminSettingsState;
}

export const reducers: ActionReducerMap<AdminSettingsState> = {
  layout: fromLayout.reducer,
  userform: fromUserForm.reducer,
  usersearch: fromUserSearch.reducer,
  users: fromUsers.reducer,
  roomform: fromRoomForm.reducer,
  roomsearch: fromRoomSearch.reducer,
  excel: fromExcel.reducer,
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

export const getUsersState = createSelector(
  selectAdminSettingsState,
  state => state.users
);

export const getSelectedUserId = createSelector(
  getUsersState,
  fromUsers.getSelectedId
);

export const {
  selectIds: getUserIds,
  selectEntities: getUserEntities,
  selectAll: getAllUsers,
  selectTotal: getTotalUsers,
} = fromUsers.adapter.getSelectors(getUsersState);

export const getSelectedUser = createSelector(
  getUserEntities,
  getSelectedUserId,
  (entities, selectedId) => {
    return selectedId && entities[selectedId];
  }
);

export const getUserSearchState = createSelector(
  selectAdminSettingsState,
  (state: AdminSettingsState) => state.usersearch
);

export const getUserSearchIds = createSelector(
  getUserSearchState,
  fromUserSearch.getIds
);
export const getUserSearchQuery = createSelector(
  getUserSearchState,
  fromUserSearch.getQuery
);
export const getUserSearchLoading = createSelector(
  getUserSearchState,
  fromUserSearch.getLoading
);
export const getUserSearchError = createSelector(
  getUserSearchState,
  fromUserSearch.getError
);

export const getUserSearchPages = createSelector(
  getUserSearchState,
  fromUserSearch.getPages
);

export const getUserSearchTotalItems = createSelector(
  getUserSearchState,
  fromUserSearch.getTotalItems
);

export const getUserSearchSort = createSelector(
  getUserSearchState,
  fromUserSearch.getSort
);

export const getUserSearchResults = createSelector(
  getUserEntities,
  getUserSearchIds,
  (users, searchIds) => {
    return searchIds.map(id => users[id]);
  }
);


export const selectRoomFormState = createSelector(
  selectAdminSettingsState,
  (settingsSate: AdminSettingsState) => settingsSate.roomform
);

export const getRoomFormError = createSelector(
  selectRoomFormState,
  getError
);

export const getRoomFormSuccess = createSelector(
  selectRoomFormState,
  getSuccess
);

export const getRoomFormPending = createSelector(
  selectRoomFormState,
  getPending
);









export const getRoomSearchState = createSelector(
  selectAdminSettingsState,
  (state: AdminSettingsState) => state.roomsearch
);

export const getSelectedRoomId = createSelector(
  getRoomSearchState,
  fromRoomSearch.getSelectedId
);

export const getRoomSearchError = createSelector(
  getRoomSearchState,
  fromRoomSearch.getError
);

export const getRoomSearchSuccess = createSelector(
  getRoomSearchState,
  fromRoomSearch.getSuccess
);

export const getRoomSearchLoading = createSelector(
  getRoomSearchState,
  fromRoomSearch.getLoading
);

export const getSelectedRoom = createSelector(
  fromRoot.getRoomEntities,
  getSelectedRoomId,
  (entities, selectedId) => {
    return selectedId && entities[selectedId];
  }
);

export const selectExcelState = createSelector(
  selectAdminSettingsState,
  (settingsSate: AdminSettingsState) => settingsSate.excel
);

export const selectExcelError = createSelector(
  selectExcelState,
  fromExcel.getError
)

export const selectExcelSuccess = createSelector(
  selectExcelState,
  fromExcel.getSuccess
)

export const selectExcelMessage = createSelector(
  selectExcelState,
  fromExcel.getMessage
)

export const selectExcelPending = createSelector(
  selectExcelState,
  fromExcel.getPending
)

export const selectExcelStateState = createSelector(
  selectExcelState,
  fromExcel.getState
)

