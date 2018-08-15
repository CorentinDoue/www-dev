import * as fromLayout from './layout.reducer';
import * as fromUserForm from './room-form.reducer';
import * as fromUserSearch from './user-search.reducer';
import * as fromUsers from './users.reducer';
import * as fromRoot from '../../core/reducers';
import * as fromRoomForm from './room-form.reducer';
import * as fromRoomSearch from './room-search.reducer';
import * as fromRooms from './rooms.reducer';

import {ActionReducerMap, createFeatureSelector, createSelector} from '@ngrx/store';
import {getError, getPending, getSuccess} from './user-form.reducer';


export interface AdminSettingsState {
  layout: fromLayout.State;
  userform: fromUserForm.State;
  usersearch: fromUserSearch.State;
  users: fromUsers.State;
  roomform: fromRoomForm.State;
  roomsearch: fromRoomSearch.State;
  rooms: fromRooms.State;
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
  rooms: fromRooms.reducer,
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

export const getRoomsState = createSelector(
  selectAdminSettingsState,
  state => state.rooms
);

export const getSelectedRoomId = createSelector(
  getRoomsState,
  fromRooms.getSelectedId
);

export const {
  selectIds: getRoomIds,
  selectEntities: getRoomEntities,
  selectAll: getAllRooms,
  selectTotal: getTotalRooms,
} = fromRooms.adapter.getSelectors(getRoomsState);

export const getSelectedRoom = createSelector(
  getRoomEntities,
  getSelectedRoomId,
  (entities, selectedId) => {
    return selectedId && entities[selectedId];
  }
);

export const getRoomSearchState = createSelector(
  selectAdminSettingsState,
  (state: AdminSettingsState) => state.roomsearch
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
