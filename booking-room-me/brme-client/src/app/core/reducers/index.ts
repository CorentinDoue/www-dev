import {
  ActionReducerMap,
  createSelector,
  createFeatureSelector,
  ActionReducer,
  MetaReducer,
} from '@ngrx/store';
import { environment } from '../../../environments/environment';
import * as fromRouter from '@ngrx/router-store';
import * as fromRooms from './rooms.reducer';

/**
 * storeFreeze prevents state from being mutated. When mutation occurs, an
 * exception will be thrown. This is useful during development mode to
 * ensure that none of the reducers accidentally mutates the state.
 */
import { storeFreeze } from 'ngrx-store-freeze';

/**
 * Every reducer module's default export is the reducer function itself. In
 * addition, each module should export a type or interface that describes
 * the state of the reducer plus any selector functions. The `* as`
 * notation packages up all of the exports into a single object.
 */

import * as fromLayout from './layout.reducer';
import {initStateFromLocalStorage} from './init-state-from-local-storage.reducer';

/**
 * As mentioned, we treat each reducer like a table in a database. This means
 * our top level state interface is just a map of keys to inner state types.
 */
export interface State {
  layout: fromLayout.State;
  router: fromRouter.RouterReducerState;
  rooms: fromRooms.State;
}

/**
 * Our state is composed of a map of action reducer functions.
 * These reducer functions are called with each dispatched action
 * and the current or initial state and return a new immutable state.
 */
export const reducers: ActionReducerMap<State> = {
  layout: fromLayout.reducer,
  router: fromRouter.routerReducer,
  rooms: fromRooms.reducer,
};

// console.log all actions
export function logger(reducer: ActionReducer<State>): ActionReducer<State> {
  return function(state: State, action: any): State {
    console.log('state', state);
    console.log('action', action);

    return reducer(state, action);
  };
}

/**
 * By default, @ngrx/store uses combineReducers with the reducer map to compose
 * the root meta-reducer. To add more meta-reducers, provide an array of meta-reducers
 * that will be composed to form the root meta-reducer.
 */
export const metaReducers: MetaReducer<State>[] = !environment.production
  ? [storeFreeze]
  : [];

/**
 * Layout Reducers
 */
export const getLayoutState = createFeatureSelector<State, fromLayout.State>(
  'layout'
);

export const getShowSidenav = createSelector(
  getLayoutState,
  fromLayout.getShowSidenav
);

export const getShowUsernav = createSelector(
  getLayoutState,
  fromLayout.getShowUsernav
);

export const getRouterState = createFeatureSelector<State, fromRouter.RouterReducerState>(
  'router'
);

//
export const getUrlState = createSelector(
  getRouterState,
  (state: fromRouter.RouterReducerState) => state.state
);

// export const isLoginPageState = createSelector(
//   getUrlState,
//   url => url === 'login'
// );

export const getRoomsState = createFeatureSelector<State, fromRooms.State>(
  'rooms'
);



export const {
  selectIds: getRoomIds,
  selectEntities: getRoomEntities,
  selectAll: getAllRooms,
  selectTotal: getTotalRooms,
} = fromRooms.adapter.getSelectors(getRoomsState);

export const getSelectedRoomId = createSelector(
  getRoomsState,
  fromRooms.getSelectedId
);


export const getSelectedRoom = createSelector(
  getSelectedRoomId,
  getRoomEntities,
  (id, entities) => entities[id]
);

export const getRoomNames = createSelector(
  getAllRooms,
  rooms => rooms.map(room => room.name)
);
