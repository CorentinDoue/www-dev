import { NgModule } from '@angular/core';

import { SettingsRoutingModule } from './settings-routing.module';
import {SharedModule} from '../shared/shared.module';
import { SettingsComponent } from './components/settings/settings.component';
import { AdminSettingsComponent } from './components/admin-settings/admin-settings.component';
import {StoreModule} from '@ngrx/store';
import {reducers} from './reducers';
import {EffectsModule} from '@ngrx/effects';
import {AdminSettingsGuard} from './services/admin-settings-guard.service';
import { UserFormComponent } from './components/user-form/user-form.component';
import {UserAdminSettingsEffects} from './effects/users.effects';

@NgModule({
  imports: [
    SharedModule,
    SettingsRoutingModule,
    StoreModule.forFeature('adminsettings', reducers),
    EffectsModule.forFeature([UserAdminSettingsEffects]),
  ],
  declarations: [SettingsComponent, AdminSettingsComponent, UserFormComponent],
  providers: [AdminSettingsGuard]
})
export class SettingsModule { }
