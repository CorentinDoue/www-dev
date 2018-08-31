import {createEntityAdapter, EntityAdapter, EntityState} from '@ngrx/entity';
import {Reservation} from '../models/reservation.model';
import {ReservationActionsUnion, ReservationActionTypes} from '../actions/reservation.actions';


/**
 * @ngrx/entity provides a predefined interface for handling
 * a structured dictionary of records. This interface
 * includes an array of ids, and a dictionary of the provided
 * model type by id. This interface is extended to include
 * any additional interface properties.
 */
export interface State extends EntityState<Reservation> {
  currentDate: number | null;
  error: string | null;
}

/**
 * createEntityAdapter creates an object of many helper
 * functions for single or multiple operations
 * against the dictionary of records. The configuration
 * object takes a record id selector function and
 * a sortComparer option which is set to a compare
 * function if the records are to be sorted.
 */
export const adapter: EntityAdapter<Reservation> = createEntityAdapter<Reservation>({
  selectId: (reservation: Reservation) => reservation.id,
  sortComparer: false,
});

/**
 * getInitialState returns the default initial state
 * for the generated entity state. Initial state
 * additional properties can also be defined.
 */
export const initialState: State = adapter.getInitialState({
  currentDate: null,
  error: null,
});

export function reducer(
  state = initialState,
  action: ReservationActionsUnion
): State {
  switch (action.type) {

    case ReservationActionTypes.SetDate:
      return {
        ...state,
        currentDate: action.payload.timeStamp
      };

    case ReservationActionTypes.RoomReservationsFailure:
      return {
        ...state,
        error: action.payload
      };

    case ReservationActionTypes.GetRoomReservationsSuccess:
      return adapter.addMany(action.payload.collection, state);

    case ReservationActionTypes.PostRoomReservationSuccess:
      return adapter.addOne(action.payload, state);

    case ReservationActionTypes.DeleteRoomReservationSuccess:
      return adapter.removeOne(action.payload, state);

    default:
      return state;
  }
}

/**
 * Because the data structure is defined within the reducer it is optimal to
 * locate our selector functions at this level. If store is to be thought of
 * as a database, and reducers the tables, selectors can be considered the
 * queries into said database. Remember to keep your selectors small and
 * focused so they can be combined and composed to fit each particular
 * use-case.
 */

export const getError = (state: State) => state.error;
export const getCurrentDate = (state: State) => state.currentDate;
