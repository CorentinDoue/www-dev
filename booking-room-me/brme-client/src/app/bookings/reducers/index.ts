import {
  createSelector,
  createFeatureSelector,
  ActionReducerMap,
} from '@ngrx/store';
import * as fromRoot from '../../core/reducers';
import * as fromReservation from './reservation.reducer';
import * as fromRooms from '../../core/reducers/rooms.reducer';
import * as fromRoomLayer from './layer.reducer';
import * as fromAuth from '../../auth/reducers';
import {getQuarters} from './layer.reducer';


export interface BookingState {
  reservation: fromReservation.State;
  layer: fromRoomLayer.State;
}

export interface State extends fromRoot.State {
  booking: BookingState;
}

export const reducers: ActionReducerMap<BookingState> = {
  reservation: fromReservation.reducer,
  layer: fromRoomLayer.reducer,
};

export const selectBookingState = createFeatureSelector<State, BookingState>('booking');

export const selectReservationState = createSelector(
  selectBookingState,
  (state: BookingState) => state.reservation
);

export const selectLayerState = createSelector(
  selectBookingState,
  (state: BookingState) => state.layer
);

export const selectQuartersState = createSelector(
  selectLayerState,
  fromRoomLayer.getQuarters
);

export const selectPendingState = createSelector(
  selectLayerState,
  fromRoomLayer.getPending
);

export const {
  selectIds: getReservationIds,
  selectEntities: getReservationEntities,
  selectAll: getAllReservations,
  selectTotal: getTotalReservations,
} = fromReservation.adapter.getSelectors(selectReservationState);

export const getReservationError = createSelector(
  selectReservationState,
  fromReservation.getError
);

export const getReservationCurrentDate = createSelector(
  selectReservationState,
  fromReservation.getCurrentDate
);

export const getCurrentRoomReservations = createSelector(
  fromRoot.getSelectedRoomId,
  getAllReservations,
  getReservationCurrentDate,
  (id, reservations, date) => reservations.filter(reservation => {
    return reservation.room.id === id && isInWeek(reservation.startTime, date);
  })
);

export const getDays = createSelector(
  getCurrentRoomReservations,
  getReservationCurrentDate,
  selectQuartersState,
  (reservations, date, quarters) =>
     Array.from(new Array(7), (val, index) => {
      const timestamp = getLastMonday(date) + index * 24 * 60 * 60;
      return {
        reservations: reservations.filter(reservation =>
          reservation.startTime >= timestamp
          && reservation.startTime < timestamp + 24 * 60 * 60 ),
        timestamp: timestamp,
        quarter: quarters[index]
      };
    })
);

// export const getHomeReservations1 = createSelector(
//   fromAuth.getSessionRoom1,
//   getAllReservations,
//   (id, reservations) => reservations.filter(reservation => {
//     return reservation.room.id === id && isInWeek(reservation.startTime, null);
//   })
// );

// export const getHomeDays1 = createSelector(
//   getHomeReservations1,
//   selectHomeQuartersState1,
//   (reservations, quarters) =>
//     Array.from(new Array(2), (val, index) => {
//       const timestamp = getLastMonday(null) + index * 24 * 60 * 60;
//       return {
//         reservations: reservations.filter(reservation =>
//           reservation.startTime >= timestamp
//           && reservation.startTime < timestamp + 24 * 60 * 60 ),
//         timestamp: timestamp,
//         quarter: quarters[index]
//       };
//     })
// );


export function getLastMonday(timestamp: number): number {
  const currentDate = timestamp === null ? new Date() : new Date(timestamp * 1000);
  const offsetDay = currentDate.getDay() === 0 ? 6 : currentDate.getDay() - 1 ;
  const lastmonday = new Date(currentDate.setDate(currentDate.getDate() - offsetDay ));
  lastmonday.setHours(0);
  lastmonday.setMinutes(0);
  lastmonday.setSeconds(0);
  lastmonday.setMilliseconds(0);
  return Math.floor(lastmonday.getTime() / 1000);
}

export function getNextMonday(timestamp: number): number {
  const currentDate = timestamp === null ? new Date() : new Date(timestamp * 1000);
  const offsetDay = currentDate.getDay() === 0 ? -1 : currentDate.getDay() - 8 ;
  const lastmonday = new Date(currentDate.setDate(currentDate.getDate() - offsetDay ));
  lastmonday.setHours(0);
  lastmonday.setMinutes(0);
  lastmonday.setSeconds(0);
  lastmonday.setMilliseconds(0);
  return Math.floor(lastmonday.getTime() / 1000);
}

export function isInWeek(timestamp: number, weekTimestamp: number | null): boolean {
  if ( timestamp >= getLastMonday(weekTimestamp) && timestamp < getNextMonday(weekTimestamp)) {
    return true;
  } else {
    return false;
  }
}


