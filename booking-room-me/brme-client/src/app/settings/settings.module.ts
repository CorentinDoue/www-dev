import { NgModule } from '@angular/core';

import { SettingsRoutingModule } from './settings-routing.module';
import {SharedModule} from '../shared/shared.module';
import { AdminSettingsComponent } from './containers/admin-settings/admin-settings.component';
import {StoreModule} from '@ngrx/store';
import {reducers} from './reducers';
import {EffectsModule} from '@ngrx/effects';
import {AdminSettingsGuard} from './services/admin-settings-guard.service';
import { UserFormComponent } from './components/user-form/user-form.component';
import {UserAdminSettingsEffects} from './effects/users.effects';
import { SearchComponent } from './components/search/search.component';
import { RoomsListComponent } from './components/rooms-list/rooms-list.component';
import { UserManagementComponent } from './containers/user-management.component';
import { UserNewComponent } from './containers/user-new.component';
import {UsersListComponent} from './components/users-list/users-list.component';
import {RoomFormComponent} from './components/room-form/room-form.component';
import {RoomNewComponent} from './containers/room-new.component';
import {RoomManagementComponent} from './containers/room-management.component';
import {RoomAdminSettingsEffects} from './effects/rooms.effects';
import {ExcelPendingComponent} from './components/excel-pending.component';
import {ExcelSuccessComponent} from './components/excel-success.component';
import {ExcelComponent} from './containers/excel.component';
import {ExcelFormComponent} from './components/excel-form/excel-form.component';
import {ExcelAdminSettingsEffects} from './effects/excel.effects';


@NgModule({
  imports: [
    SharedModule,
    SettingsRoutingModule,
    StoreModule.forFeature('adminsettings', reducers),
    EffectsModule.forFeature([UserAdminSettingsEffects, RoomAdminSettingsEffects, ExcelAdminSettingsEffects]),
  ],
  declarations: [ AdminSettingsComponent, UserFormComponent,
    SearchComponent, RoomsListComponent, UserManagementComponent,
    UserNewComponent, UsersListComponent, RoomFormComponent, RoomNewComponent, RoomManagementComponent,
    ExcelPendingComponent, ExcelSuccessComponent, ExcelFormComponent, ExcelComponent],
  providers: [AdminSettingsGuard]
})
export class SettingsModule { }
