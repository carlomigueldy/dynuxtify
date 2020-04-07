<template>
  <div>
      <v-navigation-drawer
      v-model="drawer"
      :mini-variant="miniVariant"
      color="blue-grey darken-4"
      dark
      fixed
      app
    >
      <v-list>
        <v-list-item
          v-for="(item, i) in pages"
          :key="i"
          @click="$router.push({ name: item.route })"
          router
          exact
        >
          <v-list-item-action>
            <v-icon v-text="item.icon"></v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title v-text="item.title" />
          </v-list-item-content>
        </v-list-item>
      </v-list>
      <template v-slot:append>
        <v-btn
          class="ml-2"
          icon
          @click.stop="miniVariant = !miniVariant"
        >
          <v-icon>mdi-{{ `chevron-${miniVariant ? 'right' : 'left'}` }}</v-icon>
        </v-btn>
      </template>
    </v-navigation-drawer>

    <v-app-bar
      color="primary"
      :elevate-on-scroll="true"
      dark
      fixed
      dense
      app
    >
      <v-app-bar-nav-icon 
        @click.stop="drawer = !drawer" 
      />
      
      <v-toolbar-title 
        v-text="title" 
      />

      <v-spacer />

			<v-btn icon>
				<v-icon>mdi-magnify</v-icon>
			</v-btn>

      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn>
      
			<v-menu style="border-radius: 0" max-height="500" offset-y>
				<template v-slot:activator="{ on }">
					<v-btn v-on="on" icon>
						<v-avatar size="35">
							<v-img :src="avatar" />
						</v-avatar>
					</v-btn>
				</template>
				<v-card width="300" tile flat>
					<v-list>
						
						<v-list-item>
							<v-list-item-content>
								<div class="text-center">
									<v-avatar size="90">
										<v-img :src="avatar"></v-img>
									</v-avatar>
									<div class="mt-5 title font-weight-regular">
										Carlo Miguel Dy
									</div>
									<div class="subtitle-2 font-weight-regular">
										Admin
									</div>
								</div>
							</v-list-item-content>
						</v-list-item>
						
						<v-divider></v-divider>

            <v-list-item 
              @click="$router.push({ name: item.route })"
              v-for="(item, i) in subpages" :key="i">
              <v-list-item-action>
                <v-icon small v-text="item.icon"></v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title v-text="item.title"></v-list-item-title>
              </v-list-item-content>
            </v-list-item>
						
						<v-list-item @click="">
							<v-list-item-action>
								<v-icon small>mdi-logout</v-icon>
							</v-list-item-action>
							<v-list-item-content>
								<v-list-item-title>Logout</v-list-item-title>
							</v-list-item-content>
						</v-list-item>
					</v-list>
				</v-card>
			</v-menu>
      
    </v-app-bar>
  </div>
</template>

<script>
export default {
	data: () => ({
		title: 'dynuxtiy',
		avatar: 'https://ui-avatars.com/api/?name=Carlo+Doe',
    clipped: false,
    drawer: true,
    pages: [
      {
        icon: 'mdi-apps',
        title: 'Dashboard',
        route: 'dashboard'
      },
      {
        icon: 'mdi-account-group-outline',
        title: 'Users',
        route: 'users'
      }
    ],
    subpages: [
      {
        icon: 'mdi-cog-outline',
        title: 'Settings',
        route: 'settings'
      },
    ],
    miniVariant: false,
  })
}
</script>