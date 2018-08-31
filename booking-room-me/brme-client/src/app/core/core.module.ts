import {NgModule, Optional, SkipSelf} from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app-component/app.component';
import { NotFoundPageComponent } from './components/not-found-page.component';
import {LocalStorageService} from './services/local-storage.service';
import {SharedModule} from '../shared/shared.module';
import {UserService} from './services/user.service';
import {JsonLdService} from './services/json-ld.service';
import {RoomService} from './services/room.service';
import {EffectsModule} from '@ngrx/effects';
import {UserAdminSettingsEffects} from '../settings/effects/users.effects';
import {RoomAdminSettingsEffects} from '../settings/effects/rooms.effects';
import {LayoutEffects} from './effects/layout.effects';
import {UrlSafeStringService} from './services/url-safe-string.service';
import {DateService} from './services/date.service';
import {ReservationService} from './services/reservation.service';
import {ExcelService} from './services/excel.service';




export const COMPONENTS = [
  AppComponent,
  NotFoundPageComponent,
];

export const SERVICES = [
  LocalStorageService,
  UserService,
  JsonLdService,
  RoomService,
  UrlSafeStringService,
  DateService,
  ReservationService,
  ExcelService
];

@NgModule({
  imports: [
    CommonModule,
    RouterModule,
    SharedModule,
    EffectsModule.forFeature([LayoutEffects]),
  ],
  declarations: COMPONENTS,
  exports: COMPONENTS,
})
export class CoreModule {

  constructor(
    @Optional()
    @SkipSelf()
      parentModule: CoreModule
  ) {
    if (parentModule) {
      throw new Error('CoreModule is already loaded. Import only in AppModule');
    }
  }

  static forRoot() {
    return {
      ngModule: CoreModule,
      providers: SERVICES,
    };
  }
}
