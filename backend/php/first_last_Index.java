class Solution {
    public int[] searchRange(int[] nums, int target) {//1 2 3 4 5 5 5 7 8   t=5
        int[] ans={-1,-1};
        int start=search(nums,target,true);
        int end=search(nums,target,false);
        ans[0]=start;
        ans[1]=end;
        return ans;
    }
    public int search(int[] arr,int target,boolean findStartIndex)//1 2 3 4 5 5 5 7 8   t=5   true
    {
        int ans=-1;
        int start=0;
        int end=arr.length-1;//9-1=8
        while(start<=end)//0<=8 true 0<=3 1<=3 3<=3 4<=3
        {
            int mid=start+(end-start)/2;//0+(8-0)/2=4  0+(3-0)/2=1  1+(3-1)/2=2 3+(3-3)/2=3
            if(target<arr[mid])//5<arr[4] false 5<2 false  5<3 false 5<4
            {
                end=mid-1;
            }
            else if(target>arr[mid])//5>arr[4]  false 5>2  5>3 true 5>4 true
            {
                start=mid+1; //start=1 3 4
            }
            else
            {
                ans=mid;//ans=4 
                if(findStartIndex) // true
                {
                    end=mid-1; //end=4-1=3
                }
                else start=mid+1;
            }

        }
        return ans;//4
    }
}